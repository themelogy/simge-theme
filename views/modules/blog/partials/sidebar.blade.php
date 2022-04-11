<div class="x_blog_right_side_wrapper float_left">
    <div class="row">
        <div class="col-md-12">
            @blogCategories(20,'sidebar.categories')
        </div>
        <div class="col-md-12">
            @blogLatestPosts(4, 'sidebar.latest')
        </div>
        <div class="col-md-12">
            @blogArchive('sidebar.archive')
        </div>
        <div class="col-md-12">
            @isset($post)
                @blogTags($post, 10, 'sidebar.tags')
            @endisset
            @isset($posts)
                @blogTags($posts, 2, 'sidebar.tags')
            @endisset
        </div>
    </div>
</div>