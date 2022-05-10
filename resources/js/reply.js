// リプライ表示処理

const comment = document.querySelectorAll('.fa-comment');



const replyClick = (e) => {
    e.preventDefault();

    const $this = e.target;

    if($this.nextElementSibling.classList.contains('second_frame')) {
        $this.nextElementSibling.classList.remove('second_frame');
        document.querySelectorAll('.reply_form')[0].style.display = 'block';
    } else {
        $this.nextElementSibling.classList.add('second_frame');
        document.querySelectorAll('.reply_form')[0].style.display = 'none';
    }

};

// 全てのリプライに対して関数適応
let index = 0;
while(index < comment.length){
comment[index].addEventListener('click', (e) => replyClick((e)));
index++;
}