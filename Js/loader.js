let names = document.getElementById('name');
let icon = document.getElementById('icon');
let modal = document.getElementById('modal');

function generate() {

    names.classList.add('hidden');
    icon.classList.toggle('hidden');

    if(names.classList == 'hidden') {
        setInterval(() => {
            modal.classList.remove('hidden');
            modal.classList.add('container-modal');
            names.classList.remove('hidden');
            icon.classList.add('hidden');
                setInterval(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('container-modal');
                    document.getElementById("myForm").submit();
                },2000);
        }, 1000);
    }
}

