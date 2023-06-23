const btn = document.querySelector('btn');

btn.addEventListener('click', ()=> {
    this.classList.toggle('active');

    setTimeout(()=> {
        this.classList.remove('active');
    }, 3000);
});