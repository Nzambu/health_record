<template>
  <div>
    <v-app-bar app color="light" clipped-left>
      <v-app-bar-nav-icon @click.stop="mini = !mini"></v-app-bar-nav-icon>
      <v-row>
          <v-col lg="2">
            <v-list-item One-line>
                <v-list-item-content>
                    <v-list-item-subtitle>{{ location }} 
                      <!-- <v-icon
                        color="grey"
                        v-bind="attrs"
                        v-on="on"
                      >
                        mdi-arrow-right
                      </v-icon>     -->
                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>         
          </v-col>        
      </v-row>
      <v-spacer></v-spacer>
      <v-btn icon>
        <!-- <v-avatar>
          <v-img src="https://gitlab.com/uploads/-/system/user/avatar/3883365/avatar.png"></v-img>
        </v-avatar> -->
        <Dialog/>
      </v-btn>
      <!-- <v-btn icon class="mr-1"> 
      </v-btn> -->
    </v-app-bar>
  </div>  
</template>
<script>
import Dialog from './Dialog'
// import Sidebar from './Sidebar'
export default {
    name: 'AppBar',
    propertyName : '',
    data () {
      return {
        mini : false
      }
    },
    computed : {
      location() {
        return this.$route.meta.name
      }, 
    },
    created()  {
      // console.log(this.$route.meta.name);
      this.$nextTick(() => {
        
      })
    },
    components : {
        Dialog,
        // Sidebar
    },
    methods : {
      
    }
}
</script>