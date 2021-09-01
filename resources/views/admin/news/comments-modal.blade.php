<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Ver comentarios
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Lista de comentarios --}}
                <ul id="comment-list" class="list-group">
                    {{-- Esto se va a autogenerar --}}
                </ul>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let article_id = {{ $article->id }}

        const updateComments = () => {
            axios.get(`/api/article/${article_id}/comments`)
                .then(response => {
                    let comments = response.data;
                    let rawHTML = '';
                    let commenListElement = document.getElementById('comment-list');

                    comments.forEach(comment => {
                        rawHTML += `
                        <li class="list-group-item">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">${comment.author}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">${comment.email}</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">Estado: ${(comment.is_banned == true) ? 'Baneado' : 'Normal'}</h6>
                                    <p class="card-text">${comment.message}</p>
                                    <button onclick="banComment(${comment.id})" class="btn btn-danger">Ban</button>
                                    <button onclick="unbanComment(${comment.id})" class="btn btn-success">Unban</button>
                                </div>
                            </div>
                        </li>
                    `;
                    });
                    commenListElement.innerHTML = rawHTML;

                }).catch(err => {

                });
        };

        const banComment = (comment_id) => {
            axios.patch(`/api/comments/${comment_id}/ban`, {})
                .then(response => {
                    /* Actualizo la lista de comentarios para consultar nuevamente a la base de datos por la api
                    y renderizar nuevamente */
                    updateComments();
                    /* Aqui podemos usar alertify para notificaciones,
                    luego lo agregas tu, es menos instrusivo que Alert() nativo, tienes que agregar una libreria     Ta wendy */
                    /* Alertify(....) */
                }).catch(err => {
                    alert("Error");
                })
        }

        const unbanComment = (comment_id) => {
            axios.patch(`/api/comments/${comment_id}/unban`, {})
                .then(response => {
                    updateComments();
                }).catch(err => {
                    alert("Error");
                });
        }


        /* Inicializamos */
        updateComments();
    </script>
@endsection
