<template>
    <div class="container py-4">
        <div class="col-lg-12 mt-5 py-5 h-100">
            <div class="card py-3 petitnav bg-light container" v-if="showings">
                <div class="d-flex flex-nowrap">
                    <a class="p-2 addbook rounded-pill btn btn-outline-primary ms-2">
                        <router-link class="ajouter" to="/demande/adddemande">Ajouter</router-link>
                    </a>
                    <a class="rounded-pill btn btn-outline-primary addbook ms-2 p-2">
                        <router-link to="/demande/demandehome" class="ajouter">Home</router-link>
                    </a>
                    <span class="username" v-if="showings">Welcome {{ username }} To Your Account</span>
                    <div class="ms-auto">
                        <form class="float-right mb-2 d-flex flex-row" @submit.prevent="search(titrerech)">
                            <input class="form-control" required type="text" name="titrerech" v-model="titrerech"
                                placeholder="Rechercher">
                            <input class="btn btn-primary ms-2 me-2" type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="ms-auto me-auto container w-50" v-if="!showings">
                <form class="float-right mb-2 d-flex flex-row" @submit.prevent="search(titrerech)">
                    <input class="form-control" required type="text" name="titrerech" v-model="titrerech"
                        placeholder="Rechercher">
                    <input class="btn btn-primary ms-2 me-2" type="submit">
                </form>
            </div>
        </div>
        <div class="card col-lg-8 ms-auto me-auto mt-3 p-5">
            <div class="card p-5 mb-4" v-for="demande in demandes" :key="demande.id">
                <a class="btn btn-danger rounded-pill mb-4 ms-auto" v-if="showings" @click="deletedemande($event, demande.id)">
                    <i class="fa fa-trash"></i>
                </a>
                <span class="me-auto my-3 fs-5">Créer en {{ demande.created_at }}</span>
                <span class="me-auto my-3 fs-5">Modifier en {{ demande.updated_at }}</span>
                <img class="img-fluid w-100 rounded imgphoto" :src="demande.photo_de" alt="">
                <h1 class="me-auto py-3 strt">{{ demande.titre_de }}</h1>
                <h4 class="me-auto py-3 strt desc">{{ demande.description_de }}</h4>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props: ["setvr", "showings"],
    name : "Demande-Home",
    data() {
        return {
            demandes: [],
            demande: {
                id: "",
                photo_de: "",
                titre_de: "",
                description_de: "",
                created_at: "",
                updated_at: "",
                titrerech: ""
            },
            token: localStorage.getItem("token"),
            username: localStorage.getItem("name")
        };
    },
    created() {
        this.getAlldemande();
    },
    methods: {
        getAlldemande() {
            axios.get("http://127.0.0.1:8000/api/demandes")
                .then(response => this.demandes = response.data)
                .catch(err => console.log(err));
        },
        deletedemande(event, id) {
            let config = {
                headers: {
                    Accept: "application/json",
                    Authorization: `Bearer ${this.token}`
                }
            }
            axios.delete("http://127.0.0.1:8000/api/demandes/" + id, config)
                .then(response => {
                    console.log(response.data)
                    event.target.parentElement.parentElement.remove()
                })
        },
        search(titrerech) {
            axios.get("http://127.0.0.1:8000/api/demandes/search/" + titrerech)
                .then(console.log(titrerech))
                .then((response) => this.demandes = response.data)
                .catch(err => console.log(err));
        },
    }
}
</script>
<style scoped lang="scss">
.addbook {
    text-decoration: none !important;
    font-weight: bold !important;
    width: 8% !important;
}

.ajouter {
    display: inline-block !important;
    text-decoration: none !important;
}

@media (max-width: 992px) {
    .ajouter {
        font-size: 10px !important;
    }

    .username {
        font-size: 15px !important;
    }
}

@media (max-width: 768px) {
    .ajouter {
        font-size: 8px !important;
    }

    .username {
        font-size: 7px !important;
    }
}

.ajouter:hover {
    color: white !important;
}

.strt {
    text-align: start !important;
}

.desc {
    font-size: 16px !important;
    text-align: justify !important;
}

.username {
    display: flex;
    align-items: center;
    font-weight: bold;
    font-size: larger;
    margin-left: auto;
    color: blue;
}

.petitnav {
    display: flex;
    justify-content: center;
    position: fixed;
    width: 88%;
    top: 86px;
    z-index: 99;
    // background-color: whitesmoke;
}
.imgphoto {
    max-width: 75% !important;
    max-height: auto !important;
}
</style>