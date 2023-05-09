<form method="POST" action="{{ route('cards.store') }}">
    @csrf
    <input type="hidden" name="idBoard" value="{{ $idBoard }}">
    <div>
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="description">Descripción</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div>
        <button type="submit">Crear</button>
    </div>
</form>
