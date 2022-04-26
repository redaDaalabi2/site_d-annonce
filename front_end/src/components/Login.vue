<template>
    <section class="mrgform">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 my-4">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../assets/undraw_sign_in_re_o58h.svg" class="img-fluid" alt="Login image">
                </div>
                <div class="card col-12 col-md-9 col-lg-7 col-xl-6">
                <div style="border-radius: 15px;">
                    <div class="card-body p-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <form @submit.prevent="login_utilisateur">
                        <div class="form-outline mb-3">
                            <input class="form-label form-control form-control-lg" required type="email" name="email" v-model="email" placeholder="E-mail">
                        </div>
                        <div class="form-outline mb-3">
                            <input class="form-label form-control form-control-lg" required type="password" name="password" v-model="password" placeholder="Mot de passe">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white w-100" value="Login">
                        </div>
                        <p class="text-center text-muted mt-4 mb-0">Don't have an account ? 
                            <a class="fw-bold text-body">
                                <router-link to="/">Register</router-link>
                            </a>
                        </p>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</template>

<script>
    import swal from "sweetalert";
    export default {
        props: ["setvr", "showings"],
        name : "Lo-gin",
        data() {
            return {
                email : "",
                password : ""
            };
        },
        methods: {
            login_utilisateur() {
                fetch("http://127.0.0.1:8000/api/login", {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    email: this.email,
                    password: this.password
                })
                })
                .then((res) => res.json())
                .then(data => {
                    localStorage.setItem("token", data.token)
                    localStorage.setItem("name", data.user.name)
                    console.log(data.token)
                    console.log(data.user.name)
                    this.setvr(true)
                    this.$router.push('/offre/offrehome');
                    swal({
                        title: "Login Successfuly",
                        text: "Welcome "+data.user.name,
                        icon: "success",
                        button: "ok",
                    });
                })
                .catch(() => {
                    swal({
                        title: "Something Wrong",
                        text: "Plz forget your email or password",
                        icon: "error",
                        button: "ok",
                    });
                });
            }
        }
    }
</script>

<style scoped lang="scss">
.mrgform {
    margin-top: 85px !important;
}
</style>