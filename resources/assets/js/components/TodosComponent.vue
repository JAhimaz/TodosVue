<template>
    <div class='row'>
			<h1 class="todos-title">Todos</h1>
        <form action="#" @submit.prevent="addTodo()">
            <div class="input-group">
                <input v-model="todo.title" type="text" name="title" class="form-control" autofocus>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">submit &#8594;</button>
                </span>
            </div>
        </form>
				<div class="todos-wrapper">
        <ul class="list-group todos-list">
            <li class="list-group-item" v-for="(todo, index) in todos">
								<a v-if="todo.completed" class="">{{ todo.title }}<a v-if="todo.completed"> &#10004; COMPLETED</a></a>
								<a v-else href= "" @click.prevent="editTodo(todo)">{{ todo.title }}</a>
								<p @click.prevent="deleteTodo(todo.id)" class="btn btn-danger btn-xs pull-right">&#10006;</p> <!-- Delete Button -->
								<p v-if="!todo.completed" @click.prevent="completeTodo(todo)" class="btn btn-info btn-xs pull-right">&#10004;</p> <!-- Complete Button -->
						</li>
        </ul>
				</div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                todos: [],
                todo: {
                    id: '',
                    title: '',
										completed: ''
                },
								edit: false
            };
        },

        created() {
            this.fetchTodos();
        },

        methods: {
            fetchTodos() {
                axios.get('/todos').then((res) => {
                    this.todos = res.data;
                });
            },

            addTodo() {
							if(this.edit === false){
								//Add
								axios.post('/todos', this.todo)
										.then((res) => {
												this.todo.title = '';
												this.edit = false;
												this.fetchTodos();
										})
										.catch((err) => console.error(err));
							} else {
								axios.put('/todos/' + this.todo.id, {
										title: this.todo.title
								})
										.then((res) => {
												this.todo.title = '';
												this.edit = false;
												this.fetchTodos();
										})
										.catch((err) => console.error(err));
							}
            },

            deleteTodo(id) {
                axios.delete('/todos/' + id)
                    .then((response) => {
                        this.fetchTodos();
                    })
                    .catch((err) => console.error(err));
            },
						editTodo(todo){
							if(todo.completed)
							{
								alert('You Have Already Completed this To Do.');
							}else{
								this.edit = true;
								this.todo.id = todo.id;
								this.todo.title = todo.title;
								this.todo.completed = todo.completed;
							}
						},
						completeTodo(todo){
							axios.put('/todos/' + todo.id + '/complete', {
									completed: !todo.completed
							})
									.then((res) => {
											this.fetchTodos();
									})
									.catch((err) => console.error(err));
							}
        }
    }
</script>
