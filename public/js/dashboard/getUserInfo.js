
async function user() {

    const { default: apiFetch } = await  import('../../js/utils/allFetch.js');
    await apiFetch('/users/getInfo', {
    method: "Get"
}).then(user =>{
    document.getElementById('username').innerText = user.user.full_name;
})
    .catch((error)=>{
    window.location.href='/login';
});
}
    user();
