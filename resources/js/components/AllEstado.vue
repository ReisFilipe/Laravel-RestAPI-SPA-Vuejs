<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Estados</h3>
                    </div>
                    <div class="card-body">
						<table class="table">
							<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Sigla</th>
								<th>Ação</th> 
                                <th>Data Criação</th> 
							</tr>
							</thead>
							<tbody>
							<tr v-for="estado in estados" :key="estado.id">
								<td>{{ estado.id }}</td>
								<td>{{ estado.nome }}</td>
								<td>{{ estado.sigla }}</td>
                                <td>{{ estado.created_at  }}</td>
								<td>
									<div class="btn-group" role="group">
										<router-link :to="{name: 'edit-estado', params: { id: estado.id }}" class="btn btn-success">Edit</router-link>
										<button class="btn btn-danger" @click="deleteProduct(estado.id)">Delete</button>
									</div>
								</td>
							</tr>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
import axios from 'axios';
    export default {
        name:"dashboard",
        data() {
            return {
                estados: []
            }
        },
        created() {
            const token = axios.get('/sanctum/csrf-cookie')
            const headers = {headers :
                        { Authorization: `Bearer ${token}`,
                            Accept :'application/json', 
                        }
                        };
            axios.get('/api/v1/estado/?fields=id,nome,sigla,created_at', { headers })
                .then(response => this.estados = response.data);
        },
        methods: {
            deleteProduct(id) { 
                axios
                    .delete(`/api/v1/estado/${id}`)
                    .then(response => {
                        let i = this.estados.map(data => data.id).indexOf(id);
                        this.estados.splice(i, 1)
                    });
            }
        }
    }


</script>