<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Editar Estado</h3>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<form @submit.prevent="updateEstado">
									<div class="form-group">
										<label>Nome</label>
										<input type="text" class="form-control" v-model="estado.nome">
									</div>
									<div class="form-group">
										<label>Sigla</label>
										<input type="text" class="form-control" v-model="estado.sigla">
									</div>
									<button type="submit" class="btn btn-primary">Update</button>
								</form>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
import axios from 'axios';
    export default {
        data() {
            return {
                estado: {}
            }
        },
        created() {
            axios
                .get(`http://127.0.0.1:8000/api/v1/estado/${this.$route.params.id}`)
                .then((res) => {
                    this.estado = res.data;
                });
        },
        methods: {
            updateEstado() {
                let formData = new FormData();

                formData.append('nome', 'name');
                formData.append('sigla', 'date');
                formData.append('_method', 'PUT');
                formData.append('id', this.$route.params.id);
                const token = axios.get('/sanctum/csrf-cookie')
                const headers = {headers :
                        { Authorization: `Bearer ${token}`,
                            Accept :'application/json', 
                        }
                        };
                axios
                    .post(`http://127.0.0.1:8000/api/v1/estado/`, formData, {headers})
                    .then((res) => {
                        this.$router.push({ name: 'estado' });
                    });
            }
        }
    }
</script>