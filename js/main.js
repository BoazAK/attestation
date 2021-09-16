const steps = Array.from(document.querySelectorAll('form .step'));
const nextBtn = document.querySelectorAll('form .next-btn');
const prevBtn = document.querySelectorAll('form .previous-btn');
const form = document.querySelector('form');

var progress = document.getElementById("progress");

nextBtn.forEach(button=>{
    button.addEventListener('click', () => {
        changeStep('next');
    })
})

prevBtn.forEach(button => {
    button.addEventListener('click', ()=>{
        changeStep('prev')
    })
})

form.addEventListener('submit', (e)=>{
    e.preventDefault();
    const inputs = [];
    form.querySelectorAll('input').forEach(input=>{
        const {name, value} = input;
        inputs.push({name, value})
    })
    console.log(inputs)
    form.reset();
    let index = 0;
    const active = document.querySelector('form .step.active');
    index = steps.indexOf(active);
    steps[index].classList.remove('active');
    steps[0].classList.add('active');

    if(index === 0){
        progress.style.width = "125px";
    }
})

function changeStep(btn){
    let index = 0;
    const active = document.querySelector('form .step.active');
    index = steps.indexOf(active);
    steps[index].classList.remove('active');
    if(btn === 'next'){
        index ++;
    }else if (btn === 'prev'){
        index--;
    }
    
    if(index === 0){
        progress.style.width = "125px";
    }else if(index === 1){
        progress.style.width = "250px";
    }else if(index === 2){
        progress.style.width = "375px";
    }else if(index === 3){
        progress.style.width = "500px";
    }else{
        progress.style.width = "125px";
    }
    steps[index].classList.add('active')
}