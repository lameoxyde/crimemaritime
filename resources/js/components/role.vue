<template>
    <form>
        <div class="modal-body">
            <div class="form-group">
                <input v-model="form.name" type="text" name="name" placeholder="Role Name"
                    class="form-control" :class="{'is-invaild': form.errors.has('name')}">
                <has-error :form="form" field="name"></has-error>

            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <b-button type="submit" variant="primary" class="btn-lg btn-primary" v-if="!dis" disabled><b-spinner small type="grow"></b-spinner>Creation rôle</b-button>
            <button type="submit"  v-if="dis" @click.prevent="createRole()" class="btn btn-lg btn-primary"><i class="fas fa-save"></i> Sauvegarder</button>
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
        createRole(){
            this.dis = false;
            this.form.post("/postRole").then(()=>{
                swal.fire({
                    icon: 'success',
                    title: 'Rôle créé',
                    text: 'Votre rôle a été créé',
                })
                window.location = "/role";
            }).catch(()=>{
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Quelque chose fonction mal!',
                });
            });
            this.dis=true;
        }
    },
    created(){
        this.getPermissions();
    }
}
</script>

