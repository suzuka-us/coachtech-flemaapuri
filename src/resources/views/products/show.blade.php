@auth
<form action="{{ route('comment.store', $item->id) }}" method="POST">
    @csrf
    <textarea name="comment" rows="3" placeholder="コメントを入力" required></textarea>
    <br>
    <button type="submit">コメント投稿</button>
</form>
@endauth