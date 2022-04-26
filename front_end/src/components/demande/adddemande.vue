<template>
    <section>
        <div class="mask d-flex align-items-center">
            <div class="container h-100 mt-3">
            <div class="row d-flex justify-content-center align-items-center h-100 my-4 mt-5">
                <div class="card col-12 col-md-9 col-lg-7 col-xl-6 mt-5">
                <div style="border-radius: 15px;">
                    <div class="card-body p-4">
                    <h2 class="mb-4">Ajouter un demande</h2>
                    <a class="rounded-pill btn btn-outline-primary addbook ms-auto p-2">
                        <router-link to="/demande/demandehome" class="ajouter ms-auto fw-bold">Home</router-link>
                    </a>
                    <form @submit.prevent="add_demande">
                        <div class="form-group">
                            <!-- <label for="" class="mt-4 mb-2 mrgform">Choisir un photo</label> -->
                            <!-- <br> -->
                            <!-- <input required type="file" class="mrgform" name="" accept="image/png, image/jpeg"> -->
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-4 mb-4 mrgform">Titre</label>
                            <input required type="text" name="titre_de" v-model="titre_de" class="form-control" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-4 mb-4 mrgform">Description</label>
                            <input required type="text" name="description_de" v-model="description_de" class="form-control" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary rounded-pill w-100 my-4" value="Valider">
                        </div>
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
    import axios from "axios";
    export default {
        name : "add-demande",
        data() {
            return {
                photo_de: "https://images-na.ssl-images-amazon.com/images/I/41Wv8EYpjIL._SX331_BO1,204,203,200_.jpg",
                titre_de: "",
                description_de: ""
            };
        },
        methods : {
            add_demande() {
                let config = {
                    headers: {
                        'Accept': "application/json",
                        'content-type': "application/json",
                        'Authorization': `Bearer `+ localStorage.getItem("token")
                    }
                }
                axios.post("http://127.0.0.1:8000/api/demandes/",{
                    photo_de: this.photo_de,
                    titre_de: this.titre_de,
                    description_de: this.description_de
                }, config)
                this.$router.push('/demande/demandehome');
            },
        }
    }
</script>

<style>
.mrgform {
    display: flex !important;
    justify-content: start !important;
}
.ajouter {
    display: inline-block !important;
    text-decoration: none !important;
}
.ajouter:hover {
        color: white !important;
}
</style>