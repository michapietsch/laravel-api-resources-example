# Demo of an API using Laravel resources, policies and gates to authorize access to fields and nested resources

You can follow the commits to review the steps taken.

**Features:**

-   use the [Spatie Laravel Query Builder](github.com/spatie/laravel-query-builder) for dynamically included nested resorces
-   authorize access to a nested resource using that model's corresponding policy
-   authorize access to particular fields using resource gates with a custom abilities map ([see https://laravel.com/docs/5.8/authorization#gates](laravel.com/docs/5.8/authorization#gates))

I recommend [this talk by TJ Miller at Laracon](youtube.com/watch?v=K0xid2vS7Oo). I followed his code examples in parts.

## License

Built on top of [Laravel](https://github.com/laravel/laravel). Laravel is licensed under the MIT license and so is all of this code.
