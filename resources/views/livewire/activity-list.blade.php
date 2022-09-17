<div class="mt-3">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <tbody>
                @foreach($this->activities as $activity)
                <tr>
                    <td>
                        <i class="fas {{ $activity->category->icon }} text-primary"></i>
                    </td>
                    <td>{{ $activity->category->title }}</td>
                    <td>
                        <span class="{{ $activity->category->type === 'add' ? 'text-success' : 'text-danger' }}">{{ $activity->amount . '₾' }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center justify-content-center mt-3">
        {{ $this->activities->links() }}
    </div>
</div>
