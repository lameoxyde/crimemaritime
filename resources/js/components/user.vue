<template>
    <div class="p-0">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item mr-1">
                            <button class="btn btn-sm btn-primary" @click="createMode"><i class="fas fa-plus-circle"></i> Ajouter Nouveau</button>
                        </li>
                        <li class="nav-item">
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="table_search" v-model="searchWord" class="form-control float-right" placeholder="Recherher par nom, email">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default" @click="search"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table">
                    <thead>
                        <tr>
                        <th>Nom</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td> {{ user.name }}</td>
                            <td>{{ user.role }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" @click="editUser(user)" > <i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" @click="deleteUser(user)"> <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <loading :loading="loading"></loading>
        </div>

       


        <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel" v-show="!editMode">Create User</h5>
                        <h5 class="modal-title" id="createUserModalLabel" v-show="editMode">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="!editMode ? createUser() : updateUser()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label> Nom </label>
                                <input v-model="form.name" type="text" name="name" placeholder="Nom"
                                    class="form-control" :class="{'is-invaild': form.errors.has('name')}">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label> Email </label>
                                <input v-model="form.email" type="text" name="email" placeholder="Email"
                                    class="form-control" :class="{'is-invaild': form.errors.has('email')}">
                                <has-error :form="form" field="email"></has-error>
                            </div>

                           
                            <div class="form-group">
                                <label> Choisi le role </label>
                                <b-form-select
                                    v-model="form.role"
                                    :options="roles"
                                    text-field="name"
                                    value-field="id"

                                ></b-form-select>
                                <has-error :form="form" field="role"></has-error>

                            </div>

                            <div class="form-group">
                                <label> Mot de passe </label>
                                <input v-model="form.password" type="password" name="password" placeholder="Mot de passe"
                                    class="form-control" :class="{'is-invaild': form.errors.has('password')}">
                                <has-error :form="form" field="password"></has-error>
                            </div>

                            

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button"  class="btn btn-lg btn-danger" data-dismiss="modal">Fermer</button>
                            <b-button variant="primary" v-if="!load" class="btn-lg" disabled>
                                <b-spinner small type="grow"></b-spinner>
                                {{  action }}
                            </b-button>
                            <button type="submit" v-if="load" v-show="!editMode" class="btn btn-lg btn-primary">Sauvegarder</button>
                            <button type="submit" v-if="load" v-show="editMode" class="btn btn-lg btn-success">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            action: '',
            searchWord: '',
            loading: false,
            editMode: false,
            load: true,
            img: 'http://localhost:8000/img/avatar.jpg',
            user: {},
            users: [],
            roles: [],
            form: new Form({
                'id' : '',
                'name': '',
                'password': '',
                'email': '',
                'role': 3,
            })
        }
    },
    methods:{
        search(){
            this.loading = true;
            axios.get('/search/user?s='+this.searchWord).then((response) =>{
                this.loading = false;
                this.users = response.data.users
            }).catch(() =>{
                this.loading = false;
                toast.fire({
                    icon: 'error',
                    title: "search failed"
                })

            })
        },
        createMode(){
            this.editMode = false;
            $('#createUser').modal('show');
        },

        deleteUser(user){
            swal.fire({
                title: 'Vous êtez sur?',
                text: user.name + " sera supprimé définitivement!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer'
                }).then((result) => {
                if (result.value) {
                    axios.delete('/delete/user/'+user.id).then(() =>{
                        toast.fire({
                            icon: 'success',
                            title: user.name +" a été supprimé avec succès"
                        })
                        Fire.$emit("loadUser");
                    }).catch(() =>{
                        toast.fire({
                            icon: 'error',
                            title: user.name +" n'a pas pu être retiré, aissez à nouveau plus tard"
                        })
                    })
                }
            })
        },

        editUser(user){
            this.editMode = true;
            this.form.reset();
            this.form.fill(user);
            this.form.role = user.roles[0].id;
            $('#createUser').modal('show');

        },
        getUsers(){

            this.loading = true;
            axios.get('/getAllUsers').then((response) =>{
                this.loading = false;
                this.users = response.data.users
            }).catch(()=>{
                this.loading = false;
                this.$toastr.e("Impossible de charger les utilisateurs", "Erreur");
            })
        },
        getRoles(){
            axios.get('/getAllRoles').then((response) =>{
                this.roles = response.data.roles
            });
        },
      
        createUser(){
            this.action = 'Création  ...'
            this.load = false;
            this.form.post("/account/create").then((response) => {
                this.load = true;
                this.$toastr.s("l'utilisateur crée avec succès", "Établie");
                Fire.$emit("loadUser");
                $("#createUser").modal("hide");
                this.form.reset();
            }).catch(() => {
                this.load = true;
                this.$toastr.e("Impossible de créer l'utilisateur, réessayer", "Erreur");
            });
        },

        updateUser(){
            this.action = 'Update user ...'
            this.load = false;
            this.form.put("/account/update/" +this.form.id).then((response) => {
                this.load = true;
                this.$toastr.s("informations utilisateur mises à jour avec succès", "réessayer");
                Fire.$emit("loadUser");
                $("#createUser").modal("hide");
                this.form.reset();
            }).catch(() => {
                this.load = true;
                this.$toastr.e("Impossible de mettre à jour les informations de l'utilisateur, réessayez", "Erreur");
            });
        },


    },
    created(){
        this.getUsers();
        this.getRoles();
        Fire.$on('loadUser', () => {
            this.getUsers();
        });
    }
}
</script>
