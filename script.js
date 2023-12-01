const accSetting = document.querySelector('.acc-box-container');
const accountBTN = document.querySelector('.btn-acc');
const remove = document.querySelector('.cancel');

accountBTN.addEventListener('click', ()=> {
  accSetting.classList.add('active-popup');
});

remove.addEventListener('click', ()=>{
  accSetting.classList.remove('active-popup');
});


