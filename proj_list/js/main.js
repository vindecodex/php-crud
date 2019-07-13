(function(){

    const fp = window.location.pathname;
    const isDashboard = /dashboard/.test(fp)
    // Login form
    if(!isDashboard){
const reg = document.querySelector('#reg')
reg.addEventListener('click',function(){
    const login = document.querySelector('#login')
    const loginHeading = document.querySelector('.login_form h2')

    login.style.display = "none"
    loginHeading.innerHTML = "Register"
    reg.setAttribute("type","submit")
    reg.setAttribute("name","register")
})
}

function showForm(){
    const projects = document.querySelector('#projects');
    const addProject = document.querySelector('#addProject');
    projects.style.display="none"
    addProject.style.display="block"
}

// Dashboard Add Project
const btn_add_proj = document.querySelector('#btn_add_proj');
btn_add_proj.addEventListener('click', function(){
    showForm()
});

const btn_update = document.querySelector('#update');
btn_update.addEventListener('click',function(){
    showForm()
});
})()
