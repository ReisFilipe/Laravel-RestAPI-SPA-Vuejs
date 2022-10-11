<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Cidades</h3>
                    </div>
                    <div class="btn-group" role="group">
											<router-link :to="{name: 'createcidade'}" class="btn btn-success">Adicionar Cidade</router-link>
										</div>
                    <div class="card-body">
						<div>
							<div style="display: none;" v-once>{{iduf}}</div>        
							<div class="form-group">
								<label for="estado">Estado</label>            
								<select :name="nomecampouf" class='form-control' v-model='estado' @change='getCidades()'>
									<option value='0' disabled>Selecione um Estado</option>
									<option v-for='data in estados' :value='data.id' :key='data.id' :selected="estado === data.id">{{ data.nome }}</option>
								</select>
							</div>        
						</div>
							<table class="table table-sm">
								<thead>
								<tr>
									<th  scope="col">ID</th>
									<th  scope="col">Nome</th>
									<th  scope="col">Ações</th>
								</tr>
								</thead>
								<tbody>
								<tr v-for="cidade in cidades" :key="cidade.id">
									<td scope="row">{{ cidade.id }}</td>
									<td>{{ cidade.nome }}</td>
									<td>
										<div class="btn-group" role="group">
											<router-link :to="{name: 'edit-cidade', params: { id: cidade.id }}" class="btn btn-success">Edit</router-link>
											<button class="btn btn-danger" @click="deleteCidade(cidade.id)">Delete</button>
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
        props: ['nomecampocidade', 'nomecampouf','idcidade', 'iduf'],
        data(){
            return {
                estado: 0,
                estados: [],
                cidade: 0,
                cidades: []
            }
        },
        methods:{
            getEstados: function(){
              axios.get('/api/v1/getEstados')
              .then(function (response) {
                 this.estados = response.data;
              }.bind(this));
            },
            getCidades: function() {        
                axios.get('/api/v1/getCidades',{
                 params: {
                   idUF: this.estado
                 }
              }).then(function(response){
                    this.cidades = response.data;
                }.bind(this));
            },
            deleteCidade(id) { 
                axios
                    .delete(`http://127.0.0.1:8000/api/v1/cidade/${id}`)
                    .then(response => {
                        let i = this.cidades.map(data => data.id).indexOf(id);
                        this.cidades.splice(i, 1)
                    });
            }
        },
        created: function(){
            this.getEstados();            
        },
        watch: {
            'iduf': function(){
                if(this.iduf != null)
                {
                    this.estado = this.iduf;
                    this.getCidades();
                }
            },
            'idcidade': function(){
                if(this.idcidade != null)
                {
                    this.cidade = this.idcidade;
                }
            }
        },
    }
</script>