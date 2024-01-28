// Load More Btn

function load() {
    if(document.getElementsByClassName('load-more').length > 0){
        document.querySelector(".load-more").addEventListener("click", function () {
            let btn = this;
            let page = Number(btn.getAttribute("data-page")) + 1;
            btn.setAttribute("data-page", page);
        
            let request = new XMLHttpRequest();
            request.open('POST', script_vars.ajax_url, true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            request.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector(".row").insertAdjacentHTML('beforeend', request.responseText);
                }
            }
            request.send("action=load_posts&page=" + page);
        });
    }
}

export default load;