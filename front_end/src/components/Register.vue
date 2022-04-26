<template>
    <section class="mrgform">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 my-4">
                <div class="card col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="mrgregister" style="border-radius: 15px;">
                    <div class="card-body p-4">
                    <h2 class="text-center mb-4">Register</h2>
                    <form @submit.prevent="register_utilisateur">
                        <div class="form-outline mb-3">
                            <input class="form-label form-control form-control-lg" name="name" v-model="name" required type="text" placeholder="Name">
                        </div>
                        <div class="form-outline mb-3">
                            <input class="form-label form-control form-control-lg" name="email" v-model="email" required type="email" placeholder="Email">
                        </div>
                        <div class="form-outline mb-3">
                            <input class="form-label form-control form-control-lg" name="password" v-model="password" required type="password" placeholder="Mot de passe">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white w-100" value="Register">
                        </div>
                        <p class="text-center text-muted mt-4 mb-0">Have already an account ? 
                            <a href="" class="fw-bold text-body">
                                <router-link to="/Login">Login</router-link>
                            </a>
                        </p>
                    </form>
                    </div>
                </div>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5 h-75">
                    <img src="../assets/undraw_authentication_re_svpt.svg" class="img-fluid" alt="Register image">
                </div>
            </div>
            </div>
        </div>
    </section>
</template>

<script>
    import swal from 'sweetalert';
    export default {
        name : "Regi-ster",
        data() {
            return {
                name: "",
                email : "",
                password : ""
            };
        },
        methods : {
        register_utilisateur() {
                fetch("http://127.0.0.1:8000/api/register", {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }),
                })
                .then((res) => res.json())
                .then(() => {
                    swal({
                        title: "Register Successfuly",
                        text: "Plz login to access a your account",
                        icon: "success",
                        button: "ok",
                    });
                    this.$router.push('/login');
                })
                .catch(() => {
                    swal({
                        title: "Something Wrong",
                        text: "name or email or password already exist",
                        icon: "error",
                        button: "ok",
                    });
                })
        }
    }
    }

</script>

<style scoped lang="scss">
.mrgform {
    margin-top: 85px !important;
}
</style>