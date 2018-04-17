<template>
    <div class="card">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" v-model="user.firstName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" v-model="user.lastName" class="form-control">
                </div>
                <div class="row">
                    <div class="col text-right">
                        <a href="/home" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                user: {
                    firstName: '',
                    lastName: ''
                }
            }
        },
        mounted () {
            axios.post('/user/get')
            .then(response => {
                this.user.firstName = response.data.first_name;
                this.user.lastName = response.data.last_name;
            })
            .catch(error => {
                toastr.error('Something went wrong!');
            });
        },
        methods: {
            submitForm () {
                axios.post('/user/profile/update', {
                    first_name: this.user.firstName,
                    last_name: this.user.lastName
                })
                .then(response => {
                    toastr.success('User updated!');
                })
                .catch(error => {
                    toastr.error('Something went wrong!');
                })
            }
        }
    }
</script>
