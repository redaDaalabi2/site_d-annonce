<template>
    <div class="navbar navbar-expand-md bg-light navbar-light text-black fixed-top shadow-sm p-3 mb-5">
        <div class="container">
            <a href="#" class="navbar-brand col-log fw-bold fs-4">Book <span class="text-primary">Now</span></a>
            <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="callapse navbar-collapse" id="mainmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item py-2-md me-5 offremrg">
                        <a class="nav-link">
                            <router-link to="/offre/offrehome" class="text-decoration-none">Offre</router-link>
                        </a>
                    </li>
                    <li class="nav-item py-2-md">
                        <a class="nav-link">
                            <router-link to="/demande/demandehome" class="text-decoration-none">Demande</router-link>
                        </a>
                    </li>
                </ul> 
                <div class="navbar-nav ms-auto" v-if="!showings">
                    <a>
                        <button class="btn btn-primary w-100 p-100 my-2">
                            <router-link to="/" class="registerbutt">Register</router-link>
                        </button>
                    </a>
                    <a class="ms-3 loginbutt">
                        <button class="btn btn-primary w-100 my-2">
                            <router-link to="/Login" class="registerbutt">Login</router-link>
                        </button>
                    </a>  
                </div>
                <div class="navbar-nav ms-auto" v-if="showings">
                    <a class="ms-3 loginbutt">
                        <button class="btn btn-primary w-100 my-2" @click="logout_user">
                            <router-link to="/Login" class="logoutbutt">Logout</router-link>
                        </button>
                    </a>  
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Nav-bar",
    props: ["setvr", "showings"],
    data() {
        return {
            
        };
    },
    methods: {
        logout_user() {
            localStorage.clear();
            this.setvr(false);
            this.$router.push('/login');
        },
    }
}
</script>

<style scoped lang="scss">
@media(max-width : 768px){
    .loginbutt {
        margin: 0px !important;
    }
    .offremrg {
        margin: 0px !important
    }
}
.registerbutt {
    color: white !important;
    text-decoration: none !important;
}
ul {
    li {
        a {
            color: black !important;
            font-size: 20px !important;
        }
}
}
.logoutbutt {
    color: white !important;
    text-decoration: none !important;
}
</style>