<template>
  <v-app>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <div class="todolist">
      <v-container>
        <v-text-field
        placeholder="Titulo da tarefa"
        v-model="task">
        </v-text-field>
        <v-text-field
        placeholder="Descrição"
        v-model="desc">
        </v-text-field>
        <v-select
          label="Prioridade"
          v-model="priority"
          item-text="text"
          item-value="value"
          :items="priorityList"
        ></v-select>
        <v-btn :disabled="!task" color="primary" @click="criarTarefa">CRIAR</v-btn>
        <v-divider class="mt-3"></v-divider>
        <p>Total de tarefas {{ tarefas.length }}</p>
        <p>Tarefas completas: {{ tarefasCompletas }}</p>
        <p>Tarefas pendentes: {{ tarefasIncompletas }}</p>
        <v-divider class="mt-3"></v-divider>
        <v-card v-if="tarefas.length > 0">
          <template v-for="(task, i) in tarefas">
            <div :key="task.id" class="tarefa">
              <div class="action">
                <p>{{task.priority.text}}</p>
                <v-icon
                  color="error"
                  @click="deletar(task)"
                >
                  close
                </v-icon>
              </div>
              <v-checkbox
              v-model="task.done"
              color="info darken-3">
                <div
                  slot="label"
                  v-text="task.text"
                ></div>
              </v-checkbox>
              <div
                slot="desc"
                v-text="task.desc"
              ></div>
            </div>
            <v-divider :key="`${i}-${task.text}`" class="mt-3"></v-divider>
          </template>
        </v-card>
      </v-container>
    </div>
  </v-app>
</template>
<script>
// import axios from 'axios'

export default {
  name: 'App',

  data: () => ({
    task: null,
    desc: null,
    priority: {},
    priorityList: [
      {
        text: 'baixa',
        value: 1
      },
      {
        text: 'media',
        value: 2
      },
      {
        text: 'alta',
        value: 3
      }
    ],
    tarefas: [
      {
        done: 0,
        text: 'Exemplo 1',
        id: 45644,
        desc: null,
        priority: { text: 'alta', value: 3 }
      },
      {
        done: false,
        text: 'Exemplo 2',
        id: 158184,
        desc: 'uma descrição do ex 2',
        priority: { text: 'alta', value: 3 }

      }
    ]
  }),
  computed: {
    tarefasCompletas () {
      return this.tarefas.filter(task => task.done).length
    },
    tarefasIncompletas () {
      return this.tarefas.filter(task => !task.done).length
    }
  },
  methods: {
    criarTarefa () {
      switch (this.priority) {
        case 1:
          this.priority = { text: 'baixa', value: 1 }
          break
        case 2:
          this.priority = { text: 'media', value: 2 }
          break
        case 3:
          this.priority = { text: 'alta', value: 3 }
          break
      }
      if (this.task) {
        // axios.post('/tasks', {
        //   done: 0,
        //   text: this.task
        // })
        //   .then(function (response) {
        //     console.log(response)
        //   })
        //   .catch(function (error) {
        //     console.log(error)
        //   })
        this.tarefas.push({
          done: 0,
          text: this.task,
          desc: this.desc,
          priority: this.priority
        })
      }
      this.task = null
      this.desc = null
      this.priority = null
    },
    deletar (task) {
      this.tarefas.splice(this.tarefas.indexOf(task), 1)
    }
  },
  mounted () {
    // axios.get('/tasks').then(({ data }) => {
    //   this.tarefas = data
    // })
  }

}
</script>
<style lang="scss">
  .todolist{
    .container{
      max-width: 500px;
    }
  }
  .tarefa{
    margin: 5px;
  }
  .action{
    float: right;
  }
</style>
