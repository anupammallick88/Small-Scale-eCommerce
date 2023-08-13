export interface ILoggedUser{
    user: IUser
    access_token: string
}

export interface IUser{
    id: number
    name: string
    email: string
    email_verified_at: any
    created_at: string
    updated_at: string
}
