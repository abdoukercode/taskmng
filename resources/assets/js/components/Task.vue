<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <button @click="initAddTask()" class="btn btn-primary btn-xs pull-right">
                            + Add New Task
                        </button><!--  -->
                        My Tasks</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="tasks.length > 0">
                            <tbody>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                <tr v-for="(task, index) in tasks" :key="task.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>
                                        {{ task.name }}
                                    </td>
                                    <td>
                                        {{ task.description }}
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-xs">Edit</button>
                                        <button class="btn btn-danger btn-xs">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <paginate
                        :page-count="pageCount"
                        :click-handler="fetch"
                        :prev-text="'Prev'"
                        :next-text="'Next'"
                        :container-class="'pagination'">
                    </paginate>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
 data(){
        return {
            tasks: [],
            pageCount: 1,
            endpoint: 'api/tasks?page=',
            task: {
                    name: '',
                    description: ''
                },
            errors: [],
            }
        },

created() {
            this.fetch();
        },
  mounted() {
      //this.readTasks();
    console.log("Task Component mounted");
  },
  methods: {
          fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.tasks = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
  }
};
</script>
