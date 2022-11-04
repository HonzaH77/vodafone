<section>
    <div class="container my-5 vodafone_component-project-create-comments__container">
        <h3 class="text-center text-decoration-line-through vodafone_project-component-create-comments__title">
            {{__('messages.comments')}}
        </h3>

        <div class="row d-flex justify-content-center vodafone_project-component-create-comments__row">
            <div class="col-md-12 col-lg-10 col-xl-8 vodafone_project-component-create-comments__col">
                <div class="card">

                    @foreach($comments as $comment)
                        <div
                            class="card-body d-flex flex-start align-items-center vodafone_project-component-create-comments__card-body">
                            <div>
                                <h6 class="fw-bold text-primary mb-1 vodafone_project-component-create-comments__username">{{$comment->getAuthor()}}</h6>
                                <p class="text-muted small mb-0 vodafone_project-component-create-comments__published-at">
                                    {{__('messages.published') . '-' . $comment->getCreatedAt()}}
                                </p>
                            </div>

                            <p class="mt-3 mb-4 pb-2 vodafone_project-component-create-comments__comment-text">
                                {{$comment->getText()}}
                            </p>

                        </div>
                    @endforeach
                    <div class="card-footer py-3 border-0 vodafone_project-component-create-comments__card-footer">
                        <label class="form-label vodafone_project-component-create-comments__form-label"
                               for="textAreaExample">{{__('messages.writeComment')}}
                        </label>
                        <form method="POST" action="/projects/{{$project->getId()}}/comment">
                            @csrf
                            <div class="d-flex flex-start w-100">
                                <label class="form-outline w-100" for="text">
                                    <textarea name="text"
                                              class="form-control vodafone_project-component-create-comments__form-text-area"
                                              id="text" rows="4"></textarea>
                                </label>

                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit"
                                        class="btn btn-sm btn-primary btn-outline-secondary vodafone_project-component-create-comments__submit-button btn-block">
                                    {{__('messages.publish')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
