<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Estados</h3>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<form @submit.prevent="addEstado">
									<div class="form-group">
										<label>Nome</label>
										<input type="text" class="form-control" v-model="estado.nome">
									</div>
									<div class="form-group">
										<label>Sigla</label>
										<input type="text" class="form-control" v-model="estado.sigla">
									</div>
									<button type="submit" class="btn btn-primary">Create</button>
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
        methods: {
            addEstado() {
                const token = axios.get('/sanctum/csrf-cookie')
                const headers = {headers :
                  { Authorization: `Bearer ${token}`,
                    Accept :'application/json', 
                    "Content-Type":'multipart/form-data',
                  }
                 };
                axios
                    .post('http://localhost:8000/api/v1/estado', this.estado, { headers })
                    .then(response => (
                        this.$router.push({ name: 'estado' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>