<template>
    <div>
       <div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Bee Keepers</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Images</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(bk, i) in BK" :key="i">
								
								<td v-if="bk.User_Type==3">{{bk.id}}</td>
								<td v-if="bk.User_Type==3">{{bk.First_Name}} {{bk.Last_Name}}</td>
								<td v-if="bk.User_Type==3">{{bk.Image}}</td>
								<td v-if="bk.User_Type==3">
									<button type="info" size="small" @click="getHive(bk.id)">View Hive(s)</button>
								</td>
								</tr>
		
								<!-- ITEMS -->			
						</table>
						
					</div>
					
				</div>
				
			</div>
		</div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                data: {
                    First_Name: '',
                    Last_Name: '',
					Image: '',
					User_Type: ''
				},
				BK: ''
        
            }
        },
        methods: {
             getBK(){
               axios.get('get_BK').then((res) => {
				   this.BK = res.data
			   }).catch((err) => {
				   console.log(err)
			   })
			},
			getHive($ink){
				axios.get('get_HiveBk/{{$ink}').then((res) => {
				
				})
			}
		},
		mounted(){
			this.getBK()
		}   
    }
</script>