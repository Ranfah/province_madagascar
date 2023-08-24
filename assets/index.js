let selectBtn = document.querySelector('#select_btn')
let trTable = document.querySelectorAll('#toggle')
selectBtn.addEventListener('change',()=>{
    trTable.forEach(el=>{
        if(el.className == selectBtn.value){
            el.removeAttribute("id")        
        }
        else{
            el.setAttribute("id","toggle")
        }
    })
})

trTable.forEach(el=>{
    if(el.className !== selectBtn.value){
        el.setAttribute("id","toggle")
    }
    else{
        el.removeAttribute("id");
    }
})