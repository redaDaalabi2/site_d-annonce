<template>
    <section>
        <div class="mask d-flex align-items-center">
            <div class="container h-100 mt-3">
            <div class="row d-flex justify-content-center align-items-center h-100 my-4 mt-5">
                <div class="card col-12 col-md-9 col-lg-7 col-xl-6 mt-5">
                <div style="border-radius: 15px;">
                    <div class="card-body p-4">
                    <h2 class="mb-4">Ajouter un offre</h2>
                    <a class="rounded-pill btn btn-outline-primary addbook ms-auto p-2">
                        <router-link to="/offre/offrehome" class="ajouter ms-auto fw-bold">Home</router-link>
                    </a>
                    <form @submit.prevent="add_offre">
                        <div class="form-group">
                            <!-- <label for="" class="mt-4 mb-2 mrgform">Choisir un photo</label> -->
                            <!-- <br> -->
                            <!-- <input required type="file" class="mrgform" name="photo" accept="image/png, image/jpeg"> -->
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-4 mb-4 mrgform">Titre</label>
                            <input required type="text" name="titre" v-model="titre" class="form-control" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-4 mb-4 mrgform">Description</label>
                            <input required type="text" name="description" v-model="description" class="form-control" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-4 mb-4 mrgform">Prix</label>
                            <input required type="number" name="prix" v-model="prix" class="form-control" placeholder="Prix">
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
        name : "add-offre",
        data() {
            return {
                photo: "https://m.media-amazon.com/images/I/71Vt8NkKw9L._AC_UY327_FMwebp_QL65_.jpg",
                titre: "",
                description: "",
                prix: ""
            };
        },
        methods : {
            add_offre() {
                let configure = {
                    headers: {
                        'Accept': "application/json",
                        'content-type': "application/json",
                        'Authorization': `Bearer `+ localStorage.getItem("token")
                    }
                }
                axios.post("http://127.0.0.1:8000/api/offres/",{
                    photo: this.photo,
                    titre: this.titre,
                    description: this.description,
                    prix: this.prix
                }, configure)
                this.$router.push('/offre/offrehome');
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