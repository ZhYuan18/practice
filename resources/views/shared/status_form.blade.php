<div class="send_box">
    @include('shared._error')
    <form action="{{ route('statuses.store') }}" method="post">
        {{ csrf_field() }}
        <textarea name="content" class="col-md-12" rows="6" placeholder="聊聊新鲜事儿...">{{ old('content') }}</textarea>
        <button type="submit" class="btn btn-primary send_btn">发布</button>
    </form>
</div>