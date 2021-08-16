<template>
    <form @submit.prevent="updateRole()">
        <div class="modal-body">
            <div class="form-group">
                <input v-model="form.name" type="text" name="name" placeholder="Nom rôle"
                    class="form-control" :class="{'is-invaild': form.errors.has('name')}">
                <has-error :form="form" field="name"></has-error>

            </div>

            <b-form-group label="Attribuer des autorisations">
                <b-form-checkbox
                    v-for="option in permissions"
                    v-model="form.permissions"
                    :key="option.name"
                    :value="option.name"
                    name="flavour-3a"
                >
                    {{ option.name }}
                </b-form-checkbox>
            </b-form-group>


        </div>
        <div class="modal-footer justify-content-between">
             <b-button type="submit" variant="primary" class="btn-lg btn-primary" v-if="!dis" disabled><b-spinner small type="grow"></b-spinner>Modification rôle</b-button>
            <button type="submit"  class="btn btn-lg btn-primary"><i class="fas fa-save"></i>Modifier</button>
        </div>
    </form>
</template>

<script>
export default {
    data(){
        return{
            dis: true,
            permissions: [],
            form: new Form({
                'name' : '',
                'permissions' : []
            })
        }
    },
    methods:{
        getPermissions(){
            axios.get("/getAllPermission")
            .then((response)=>{
                this.permissions = response.data.permissions
            }).catch(()=>{
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    // text: 'Quelque chose s'+ " ' " +'est mal passé!',
                     text: 'Quelque chose fonction mal!',
                })
            });
        },
         updateRole(){
            this.action = 'Update user ...'
            this.form.put("/role/update/" +this.form.id).then((response) => {
                this.$toastr.s("informations role mises à jour avec succès", "réessayer");
                this.form.reset();
            }).catch(() => {
                this.$toastr.e("Impossible de mettre à jour les informations de le role, réessayez", "Erreur");
            });
        },
       
    },
    created(){
        this.getPermissions();
    }
}
</script>

