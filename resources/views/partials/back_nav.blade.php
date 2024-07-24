<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-5">
    <ul class="nav flex-column">
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'aboutUs' ? 'nav-link active' : 'nav-link' }}" href="/back/about_us?do=aboutUs">
          <div class="nav-border"><i class="fa-solid fa-cat"></i>
            &nbsp;關於我們
          </div>
        </a>
      </li>
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'articles' ? 'nav-link active' : 'nav-link' }}" href="/back/articles/edit?do=articles&edit">
                <div class="nav-border"><i class="fa-solid fa-book-open"></i>
                &nbsp;文章管理
               </div> </a>
            </li>
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'goods' ? 'nav-link active' : 'nav-link' }}" href="/back/goods?do=goods">
          <!-- <span data-feather="shopping-cart"></span> -->
          <div class="nav-border"><i class="fa-solid fa-cart-shopping"></i>
            &nbsp;商品管理
          </div>
        </a>
      </li>
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'orders' ? 'nav-link active' : 'nav-link' }}" href="/back/orders?do=orders">
          <div class="nav-border"><i class="fa-solid fa-comments-dollar"></i>
            &nbsp;訂單管理
          </div>
        </a>
      </li>
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'messages' ? 'nav-link active' : 'nav-link' }}" href="/back/messages?do=messages">
          <div class="nav-border"><i class="fa-regular fa-envelope"></i>
            &nbsp;留言管理
          </div>
        </a>
      </li>
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'total' ? 'nav-link active' : 'nav-link' }}" href="/back/total?do=total">
          <div class="nav-border"><i class="fa-solid fa-shoe-prints"></i>
            &nbsp;足跡管理
          </div>
        </a>
      </li>
      <li class="nav-item">
      <a class="{{ request()->get('do') == 'users' ? 'nav-link active' : 'nav-link' }}" href="/back/users?do=users">
          <div class="nav-border"><i class="fa-solid fa-people-group"></i>
            &nbsp;會員管理
          </div>
        </a>
      </li>

      <li class="nav-item">
      <a class="{{ request()->get('do') == 'admins' ? 'nav-link active' : 'nav-link' }}" href="/back/admins?do=admins">
          <div class="nav-border"><i class="fa-solid fa-user-tie"></i>
            &nbsp;管理員們
          </div>
        </a>
      </li>
      <li class="nav-item mt-4">
        <a class="nav-link fs-5 mx-auto" href="../index">

          <div style="width:200px;height:50px;padding-top:8px;  border:3px dotted#ffb71b;margin:auto"><i class="fa-solid fa-paw"></i>&nbsp;回首頁</div>
        </a>
      </li>
    </ul>
  </div>

</nav>