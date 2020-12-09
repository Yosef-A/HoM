<template>
    <div class="layout">
        <div class="layout-topbar clearfix">
            <div class="layout-name" :class="{'sider-mini':isCollapse}">
                <router-link class="full" to="/" v-if="!isCollapse">Advertising Agencies</router-link>
              <span class="mini" v-else>P</span>
            </div>
            <div class="layout-collapse" @click="toggleSider"><i class="fa fa-bars"></i></div>
            <div class="layout-nav">
                <!-- dropdown-->
            </div>
        </div>
        <div class="layout-body" :class="{'sider-full': !isCollapse,'sider-mini': isCollapse}">
            <aside class="layout-sider">
                <div class="layout-user">
                    <div>UserName</div>
                </div>
           <el-menu :unique-opened="true"
           :default-active="currentRoute"
           :router="true">
           <el-menu-item index="1" :route="{name:'agency'}">
               <i class="el-icon-menu"></i>
               <span>Navigator Two</span>
           </el-menu-item>
            <el-menu-item index="2" :route="{name:'agency2'}">
               <i class="el-icon-menu"></i>
               <span>Navigator Two</span>
           </el-menu-item>
           </el-menu>
            </aside>
            <div class="layout-panel">
                <div class="layout-content">
                    <div class="layout-container">
                        <div class="layout-breadcrumb">
                            <el-breadcrumb separator="/">
                                <el-breadcrumb-item :to="{path:'/'}">Name</el-breadcrumb-item>
                            </el-breadcrumb>
                        </div>
                        <div class="layout-inner">
                            <router-view></router-view>
                        </div>
        
                    </div>
                </div>
            </div>
            <div class="layout-footer">ELLLAB @ 2018</div>
        </div>
        </div>
  
</template>
<script>
export default {
    mounted(){
        this.currentRoute = this.$route.path
    },
    watch:{
        route (newVal,oldVal){
            this.currentRoute = newVal.path
        }
    },
    data(){
        return{
            isCollapse:false,
            currentRoute:'',
        }
    },
    methods:{
        toggleSider(){
            this.isCollapse = !this.isCollapse
        },
        handleDropdown(cmd){

        }
    }
}
</script>
<style>
  html,body,#app{
      margin: 0;
      height: 100%;
  }
  .layout-topbar{
      position: fixed;
      width: 100%;
      height: 70px;
      line-height: 70px;
      background-color: #03a9f4;
      z-index: 101;
      color: #fff;

  }
  .layout-topbar a{
      color: #d3dce6;
  }
 .layout-topbar .el-dropdown-link{
      color: #fff;
  }
  .layout-name{
      width: 224px;
      text-align: center;
      float: left;
      background-color: #2a323c;
      font-family: Helvetica;
      font-size: 30px;
  }
  .layout-name.sider-mini{
     width: 64px;
  }
  .layout-name .full{
      text-decoration: none;
  }
  .layout-nav{
     float: right;
     padding-right:10px ;
  }
  .layout-nav .nav-item{
      margin-right: 10px;
  }
  .layout-nav .nav-item .fa{
     font-size: 20px;
  }
  .layout-nav .nav-item .el-badge__content.is-fixed{
      top: 20px;
  }
  .layout-nav .layout-avatar{
      width: 30px;
      height: 20px;
      border: 2px solid #d3dce6;

  }
  .layout-sider{
      top: 10px;
  }


</style>