@extends('layouts.app')
@section('header-title', __('Delivery Charges'))

@section('content')
    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between px-3">
        <h4>{{ __('Manage Delivery Charge') }}</h4>

        @hasPermission('admin.deliveryCharge.create')
        <a href="{{ route('admin.deliveryCharge.create') }}" class="btn py-2 btn-primary">
            <i class="fa fa-plus-circle"></i>
            {{ __('Create New') }}
        </a>
        @endhasPermission
    </div>

    <div class="container-fluid mt-3">

        <div class="my-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-left-right table-responsive-lg">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th class="text-center">{{ __('Min. Order QTY') }}</th>
                                <th class="text-center">{{ __('Max. Order QTY') }}</th>
                                <th class="text-center">{{ __('Charge') }}</th>
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        @forelse($deliveryCharges as $deliveryCharge)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}.
                                </td>

                                <td class="text-center">{{ $deliveryCharge->min_qty }}</td>
                                <td class="text-center">{{ $deliveryCharge->max_qty }}</td>
                                <td class="text-center">{{ showCurrency($deliveryCharge->charge) }}</td>

                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @hasPermission('admin.deliveryCharge.edit')
                                            <a href="{{ route('admin.deliveryCharge.edit', $deliveryCharge->id) }}" class="btn btn-outline-info btn-sm circleIcon">
                                                <img src="{{ asset('assets/icons-admin/edit.svg') }}" alt="edit" loading="lazy" />
                                            </a>
                                        @endhasPermission
                                        @hasPermission('admin.deliveryCharge.destroy')
                                            <a href="{{ route('admin.deliveryCharge.destroy', $deliveryCharge->id) }}" class="btn btn-outline-danger btn-sm deleteConfirm circleIcon">
                                                <img src="{{ asset('assets/icons-admin/trash.svg') }}" alt="delete" loading="lazy" />
                                            </a>
                                        @endhasPermission
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="my-3">
            {{ $deliveryCharges->links() }}
        </div>

    </div>
@endsection

