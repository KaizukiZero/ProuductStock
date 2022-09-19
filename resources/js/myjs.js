
console.log('Test My JS');

var modal = document.getElementById('mainModal');
if(modal != ''){
    
    modal.addEventListener('show.bs.modal',(e) =>{
        var button = e.relatedTarget
        var recipient = button.getAttribute('data-bs-code')
        var modalbody = modal.querySelector('.modal-body')
        var title = modal.querySelector('.modal-title')
    
        title.textContent = "Product Code : " + recipient
    
        axios({
            method: 'GET',
            url: '/product/' + recipient,
        }).then((res)=>{
            modalbody.innerHTML = res.data
            console.log('Pass');
        })
        
    })
}
