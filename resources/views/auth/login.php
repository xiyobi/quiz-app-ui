<?php require '../resources/views/componets/header.php'; ?>

<body class="bg-gray-50">
<div>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">
                        create a new account
                    </a>
                </p>
            </div>
            <form  id="login-form" class="mt-8 space-y-6" method="POST" onsubmit="login()">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Password">
                        <div id="passwordError" class="text-red-500 text-sm hidden">
                            Parolni kiriting!
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                        <div id="error"></div>
                    </div>
                </div>

            <div>
                <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    async function login() {
        event.preventDefault();
        let form = document.getElementById("login-form"),
            formData = new FormData(form);
        const { default: apiFetch } = await import('./js/utils/allFetch.js');
        await apiFetch('/login', {
            method: "Post",
            body: formData
        }).then(data =>{
            localStorage.setItem('token', data.token);
            window.location.href='/dashboard';
        })
            .catch((error)=>{
            console.error(error.data.errors);
                document.getElementById('error').innerHTML = "";
                Object.keys(error.data.errors).forEach(err => {
                document.getElementById('error').innerHTML += `
                <p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;

            })
        });
    }

</script>
    <?php require '../resources/views/componets/footer.php'; ?>

