export interface ICartProduct{
    id: number
    category_id: number
    title: string
    description: string
    cost: number
    created_at: string
    updated_at: string
    pivot: ICartPivot
}

export interface ICartPivot{
    cart_id: number
    product_id: number
    created_at: string
    updated_at: string
    quantity: number
}