<?php


namespace App\Http\Services;


use App\Http\Repositories\OrderRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserService implements UserServiceInterface
{
    protected $profileRepo;
    protected $orderRepo;

    public function __construct(UserRepositoryInterface $profileRepo, OrderRepositoryInterface $orderRepo)
    {
        $this->profileRepo = $profileRepo;
        $this->orderRepo = $orderRepo;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->profileRepo->getAll();
    }

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        return $this->profileRepo->getById($id);
    }

    public function update($object, $request)
    {

        $object->email;
        $object->name = $request->name;
        $object->phone = $request->phone;
        $object->address = $request->address;
        if ($request->file('image')) {
            $currentImg = $object->image;
            if ($currentImg) {
                unlink(storage_path('app/public/' . $currentImg));
            }
            $path = $request->file('image')->store('images', 'public');
            $object->image = $path;
        }

        $this->profileRepo->update($object);
    }

    public function updatePassword($object, $request)
    {
        try {
            $currentPass = $object->password;
            $newPass = $request->old_password;
            if (Hash::check($newPass, $currentPass)) {
                $object->password = Hash::make($request->new_password);;
                $this->profileRepo->updatePassword($object);
                Auth::logout();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đổi mật khẩu thành công'
                ]);
            }

            return response()->json([
                'status' => 'errors',
                'message' => 'mật khẩu không đúng'
            ]);
        } catch (\Exception $e) {

        }
    }

    public function destroy($id)
    {
        $user = $this->profileRepo->getById($id);
        return $this->profileRepo->destroy($user);
    }

    public function getUserByHouse($houseId)
    {
        // TODO: Implement getUserByHouse() method.
        return $this->profileRepo->getUserByHouse($houseId);
    }

    public function getUserByCustomer($customerId)
    {
        // TODO: Implement getUserByCustomer() method.
        return $this->profileRepo->getUserByCustomer($customerId);
    }

    public function historyRentHouse()
    {
        // TODO: Implement historyRentHouse() method.
        $orders = $this->profileRepo->historyRentHouse();
        $orderWait = [];
        if ($orders) {
            foreach ($orders as $order) {
                $now = new Carbon();
                $orderCheckin = Carbon::create($order->checkin);
                if ($orderCheckin->greaterThan($now)) {
                    array_push($orderWait, $order);
                }
            }
        }
        return $orderWait;
    }

    public function getRentedHouse()
    {
        $orders = $this->profileRepo->historyRentHouse();
        $orderPass = [];
        if ($orders) {
            foreach ($orders as $order) {
                $now = new Carbon();
                $orderCheckin = Carbon::create($order->checkin);
                if (!$orderCheckin->greaterThan($now)) {
                    array_push($orderPass, $order);
                }
            }
        }
        return $orderPass;
    }

    public function getAreDate($request)
    {
        // TODO: Implement getMonthlyIncome() method.
        $checkMonths = $this->checkMonth($request);
        $day = 0;
        switch ($checkMonths) {
            case 1:
                $day += 30;
                break;
            case 2:
                $day += 29;
                break;
            case 3:
                $day += 28;
                break;
            default:
                break;
        }
        return $day;
    }

    public function getMonthlyIncome($request)
    {
        return $this->profileRepo->getMonthlyIncome($this->getStartDate($request), $this->getEndDate($request, $this->getAreDate($request)));
    }

    public function getStartDate($request)
    {
        return Carbon::create($request->month);
    }

    public function getEndDate($request, $areDay)
    {

        $endDate = Carbon::create($request->month);
        $endDate->addDays($areDay);

        return $endDate;
    }

    public function checkMonth($request)
    {
        $date = Carbon::create($request->month);
        $month = $date->month;
        $checkDate = 0;
        switch ($month) {
            case '1':
            case '3':
            case '5':
            case '7':
            case '8':
            case '10':
            case '12':
                $checkDate = 1;
                break;
            case '4':
            case '6':
            case '9':
            case '11':
                $checkDate = 2;
                break;
            case '2':
                $checkDate = 3;
                break;
            default:
                break;
        }
        return $checkDate;
    }

    public function getDateOfOrder($request)
    {
        $orders = $this->orderRepo->getOrderByUser($this->getStartDate($request), $this->getEndDate($request, $this->getAreDate($request)));
        $orderOfDay = [];
        for ($i = 1; $i <= $this->getAreDate($request) + 1; $i++) {
            array_push($orderOfDay, $i);
        }
        return $orderOfDay;
    }

    public function getMoneyOfOrder($request)
    {
        // TODO: Implement getMoneyOfOrder() method.
        $orders = $this->orderRepo->getOrderByUser($this->getStartDate($request), $this->getEndDate($request, $this->getAreDate($request)));
        $moneyOfDate = [];
        $count = 1;
        foreach ($orders as $key => $order) {
            $date = Carbon::create($order->checkout);

            for ($i = $count; $i <= $this->getAreDate($request) + 1; $i++) {
                if ($i == $date->day) {
                    array_push($moneyOfDate, $order->totalPrice);
                    $count = $date->day;
                    break;
                } else {
                    array_push($moneyOfDate, 0);
                    $count++;
                }
            }
        }
        return $moneyOfDate;
    }
}
