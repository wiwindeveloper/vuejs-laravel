<template>
	<div>
		<section>
			<h1>Daftar User</h1>
			<router-link to="/user/create">Register</router-link>
			<ul>
				<li v-for="user in users">
					<!-- <router-link :to="profile_uri(user.name)">{{user.name}}</router-link> -->
					<a href="" @click.prevent="lihatuser(user.id)">{{user.name}}</a>
				</li>
			</ul>
		</section>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				users: []
			}
		},
		mounted() {
			this.getUsers()
		},
		methods: {
			getUsers(){
				axios.get('/api/users').then((response) => {
					this.users = response.data
				})
			},
			profile_uri(name) {
				return '/user/' +name.toLowerCase()
			},
			lihatuser(id) {
				this.$router.push({
					name: 'Profile',
					params: {id}
				})
			}
		}
	}
</script>