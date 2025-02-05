async function user() {
    const {default: apiFetch} = await import('../utils/apiFetch.js');
    await apiFetch('/users/getInfo', {method: 'GET'})
        .then((user) => {
            document.getElementById('userName').innerText = user.data.full_name;
        })
        .catch((error) => {
            if (error.status === 401) {
                window.location.href = '/login';
            }
        });
}
user();