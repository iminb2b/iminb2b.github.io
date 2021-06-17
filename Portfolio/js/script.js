let menu = document.querySelectorAll('.menu');
let content = document.querySelectorAll('.content');
menu.forEach((e, index)=>{
    e.onclick = ()=>{
        document.querySelector('.menu.active').classList.remove('active')
        document.querySelector('.content.show').classList.remove('show')
        e.classList.add('active')
        content[index].classList.add('show')
    }
    
    
})
let projects = document.querySelectorAll('.project');
projects.forEach((e, index)=>{
    e.onmouseover = ()=>{
        e.querySelector('.detail').classList.add('show-detail')
    }
    e.onmouseout = ()=>{
        e.querySelector('.detail.show-detail').classList.remove('show-detail')

    }
})
let outBtn = document.querySelectorAll('.fa-times');
let details = document.querySelectorAll('.pj');
outBtn.forEach((e,index)=>{
    e.onclick = ()=>{
        console.log(details[index])
        details[index].classList.remove('show')
    }
})

let detailsBtn = document.querySelectorAll('.detail .detail-btn');

detailsBtn.forEach((e,index)=>{
    e.onclick = ()=>{
        details[index].classList.add('show')
        console.log(details[index].classList.toString())

    }
})