<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\BookRepositoryInterface;
use App\Repository\BookRepository;
use App\Repository\CustomerRepositoryInterface;
use App\Repository\CustomerRepository;
use App\Repository\BorrowRepositoryInterface;
use App\Repository\StudentRepositoryInterface;
use App\Repository\BorrowRepository;
use App\Repository\StudentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind Interface and Repository class together
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(BorrowRepositoryInterface::class, BorrowRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }
}