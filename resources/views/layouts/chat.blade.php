<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Discusión</h3>
	</div>
	<div class="panel-body">
		@if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<ul class="media-list">
			@foreach($messages as $message)
			<li class="media">
				<div class="media-body">
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object img-circle" width="48" src="{{ $message->user->avatar_path }}"></img>
						</a>
						<div class="media-body">
							{{ $message->message }}
							<br>
							<small class="text-muted">{{ $message->user->name }} | {{ $message->created_at }}</small>
							<hr>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="panel-footer">
		<form action="/mensajes" method="POST">
			<div class="input-group">
				{{ csrf_field() }}
				<input type="hidden" name="incident_id" value="{{ $incident->id }}">
				<input type="text" class="form-control" name="message">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default">Enviar</button>
				</span>
			</div>
		</form>
	</div>
</div>