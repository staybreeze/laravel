
function log() {
    let ans = $('#ans').val();
    let sessionAns = $('#sessionAns').val();
    console.log(ans);
    console.log(sessionAns);
    if (ans === '') { 
        alert('請輸入驗證碼');
    } else if (ans !== sessionAns) {
        alert('驗證碼錯誤');
    } else {
        $.post('./api/login', {
            acc: $('#acc').val(),
            pw: $('#pw').val()
        }, (res) => {
            if (res == 0) {
                alert('帳號或密碼錯誤');
            }
        });
    }
}
