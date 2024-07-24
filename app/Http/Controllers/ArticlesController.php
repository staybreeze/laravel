<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ArticlesController extends Controller
{
  public function index()
  {
      $articles = Article::all()->map(function ($article) {
          if (isset($article->time) && $article->time !== null) {
              $article->formatted_time = $article->time->format('Y-m-d_H-i-s');
          } else {
              $article->formatted_time = null;
          }
          return $article;
      });
      return view('articles', ['articles' => $articles]);
  }
    public function backEditIndex()
    {
        $perPage = 3;
        $articles = Article::paginate($perPage);

        $articles->appends(['do' => 'articles&edit']);

        return view('back.articles.edit', ['articles' => $articles]);
    }
    public function show($formatted_time)
    {
        // 將 formatted_time 轉換回原始格式
        $time = Carbon::createFromFormat('Y-m-d_H-i-s', $formatted_time)->format('Y-m-d H:i:s');
    
        // 使用轉換後的時間進行查詢
        $article = Article::where('time', $time)->firstOrFail();
    
        // 將文章數據傳遞給 Blade 模板，視圖名稱基於 $formatted_time
        return view('articles.' . $formatted_time, compact('article'));
    }
    public function editing($id, $page)
    {
        $article = Article::find($id);
    
        return view('back.articles.editing', [
            'article' => $article,
            'do' => 'articles&edit',
            'id' => $id, 
            'page' => $page,
        ]);
    }

    public function backCreateIndex()
    {

        $do = 'articles&create';
        return view('back.articles.create', ['do' => $do]);
    }

    public function create(Request $request)
    {
        $name = $request->input('title', '');
        $content = nl2br(trim($request->input('content', '')));

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $targetPath = public_path('img');
            $file->move($targetPath, $filename);
            $imgFilename = 'img/' . $filename;
        } else {
            $imgFilename = '';
        }

        $article = Article::create([
            'title' => $name,
            'content' => $content,
            'img' => $imgFilename,
            'time' => Carbon::now()
        ]);

        if ($article) {
            $this->generateArticlePage($article);
            return redirect('/back/articles/create?do=articles&create')->with('success', '文章新增成功。');
        } else {
            return redirect('/back/articles/create?do=articles&create')->with('error', '文章新增失敗。');
        }
    }

    public function update(Request $request, $id)
{
    $page = $request->input('page', 1);
    $article = Article::findOrFail($id);
    $name = $request->input('title', '');
    $content = nl2br(trim($request->input('content', '')));
    $time = $article->time->format('Y-m-d_H-i-s');
    $filename = resource_path("views/articles/{$time}.blade.php");
    
    if (file_exists($filename)) {
        if (unlink($filename)) {
            echo "檔案刪除成功！";
        } else {
            echo "檔案刪除失敗！";
        }
    } else {
        echo "檔案不存在！";
    }

    if ($request->hasFile('img')) {

        if ($article->img && file_exists(public_path($article->img))) {
            unlink(public_path($article->img));
        }

        $file = $request->file('img');
      
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $targetPath = public_path('img');
        $file->move($targetPath, $filename);
        $imgFilename = 'img/' . $filename;
    } else {
        $imgFilename = $article->img; 
    }

    $article->update([
        'title' => $name,
        'content' => $content,
        'img' => $imgFilename,
        'time' => Carbon::now() 
    ]);
    if ($article) {
        $this->generateArticlePage($article); 
        return redirect('/back/articles/edit?do=articles&edit&page=' . $page)->with('success', '文章更新成功。');
    } else {
        return redirect('/back/articles/edit?do=articles&edit&page=' . $page)->with('error', '文章更新失敗。');
    }
}

    private function generateArticlePage($article)
    {
        $title = $article->title;
        $content = $article->content;
        $imgFilename = $article->img;
        $time = $article->time->format('Y-m-d_H-i-s');

        $filename = "../resources/views/articles/" . $time . ".blade.php";
        $articleContent = $this->generateHTML($title, $content, $imgFilename);

        if (file_put_contents($filename, $articleContent)) {
            error_log("文章頁面已成功生成: " . $filename, 0);
        } else {
            error_log("錯誤：無法寫入文章頁面到 " . $filename, 0);
        }
    }
    private function generateHTML($title, $content, $imgFilename)
    {
        $articleContent = <<<HTML

            <!DOCTYPE html>
            <html lang="en">
            
            <head>
              <title>{$title}</title>
              <link rel="icon" href="{{ asset('img/logo3.jpg') }}" type="image/x-icon">
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
              <link rel="stylesheet" media="screen and (max-width: 1000px)" href="{{ asset('css/small_screen.css') }}">
              <link rel="stylesheet" media="screen and (max-width:1600px)" href="{{ asset('css/middle_screen.css') }}">
              <link rel="stylesheet" media="screen and (min-width: 1600px)" href="{{ asset('css/big_screen.css') }}">
              <style>
            .main {
              height: 100%;
            }
        
            .h3 {
              border-left: 10px solid brown;
              font-weight: bolder;
            }
        
            .box>p {
              font-size: 20px;
              line-height: 40px;
            }
        
            .footer {
              margin-top: 0px;
            }
        
            @media screen and (max-width: 550px) {
              .aside {
                margin-left: 110px;
              }
            }
        
            @media screen and (max-width: 550px) {
              .aside>img {
                width: 300px;
              }
              .box{
                width: 350px;
              }
            }
            @media screen and (max-width: 450px) {
        
           .box{
                margin-left: -50px;
              }
              .aside>img{
                margin-left: -60px;
              }
              .modal input[type='submit'] {
            margin-left: 283px !important;
             }
            }
            @media screen and (max-width: 410px) {
        
        
        .aside img{
          padding-right:30px
         }
        
         h3 {
           font-size: 18px !important;
         }
        
         input[type='submit'] {
           width: 75px;
           font-size: 13px
         }
        
         p{
           font-size: 15px !important;
         }
        
         .footer{
           /* height: 96vh !important; */
         }
         .box {
           width: 300px;
         }
         .modal input[type='submit'] {
        margin-left: 227px !important;
        }
        }
              </style>
            </head>
            <body>
            @include('partials.header.article')
            @include('partials.mouse_squares')
        <div class="container-fluid">
          <div class="row d-flex main">
            <div class="col-5 aside">
            <img src="{{ asset('$imgFilename') }}" width="100%" style="padding-top:70px">
            </div>
            <div class="col-6 section ms-5 ps-5">
              <br>
              <div class="box mt-5">
                <h3 class="h3">&nbsp; {$title}</h3>
                <p class="mt-5" id="origin">
                {$content}
                 </p> <br>
              </div>
              <div class="col-1"></div>
            </div>
          </div>
        </div>
        @include('partials.login_form')
        @include('partials.footer_article')
        </body>
        
        </html>
        HTML;

        return $articleContent;
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $time = $article->time;
        $filename = str_replace([':', ' '], ['-', '_'], $time) . '.blade.php';

        $fileToDelete = resource_path("views/articles/{$filename}");

        if (file_exists($fileToDelete) && !unlink($fileToDelete)) {
            return redirect()->back()->with('error', '檔案刪除失敗。');
        }

        if ($article->delete()) {
            return redirect()->back()->with('success', '文章刪除成功。');
        } else {
            return redirect()->back()->with('error', '文章刪除失敗。');
        }
    }
}
