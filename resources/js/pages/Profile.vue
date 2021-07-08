<template>
	<div>
		<section v-if="id">
			<img v-if="detailuser.photo" :src="'/images/'+detailuser.photo" width="100">
			<h1>Hello, User {{detailuser.name}}</h1>
			<p>Email: <strong>{{detailuser.email}}</strong></p>
			<router-link :to="{name: 'User'}">Kembali</router-link>
			<router-link :to="{name: 'Upload', params: {id: detailuser.id}}">Upload</router-link>
			<a href="" @click.prevent="handlingDelete">Hapus</a>
			<a href="" @click.prevent="Edit">Edit</a>
		</section>
	</div>
</template>

<script>
	export default {
		props: ['id'],
		data() {
			return {
				detailuser: {}
			}
		},
		mounted() {
			this.getUser()
		},
		methods: {
			getUser(){
				axios.get('/api/users/' +this.id).then((response) => {
					this.detailuser = response.data
				})
			},
			handlingDelete(){
				if(confirm('Apakah ingin dihapus?')){
					axios.delete('/api/users/' +this.id).then((response) => {
						if(response.data.status){
							this.$noty.success(response.data.message)
							this.$router.push({
								name: 'User'
							})
						}
					})
				}else{
					return false
				}
			},
			Edit() {
				this.$router.push({
					name: 'Edit',
					params: {
						id: this.id
					}
				})
			}
		}
	}
</script>