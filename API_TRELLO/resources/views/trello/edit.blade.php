<h1>Edit Card</h1>

<form method="POST" action="{{ route('cards.update', $cardId) }}">
  @csrf
  @method('PUT')
  <div>
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $card['name'] }}" required>
  </div>
  <div>
    <label for="description">Description:</label>
    <textarea name="description">{{ $card['desc'] }}</textarea>
  </div>
  <div>
    <label for="dueDate">Due Date:</label>
    <input type="date" name="dueDate" value="{{ $card['due'] }}">
  </div>
  <div>
    <button type="submit">Update Card</button>
  </div>
</form>
