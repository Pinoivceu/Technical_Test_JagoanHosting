"use client"

import * as React from "react"
import { Area, AreaChart, CartesianGrid, XAxis } from "recharts"
import api from "@/services/api"
import { useQuery } from "@tanstack/react-query"
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card"
import {
    ChartConfig,
    ChartContainer,
    ChartLegend,
    ChartLegendContent,
    ChartTooltip,
    ChartTooltipContent,
} from "@/components/ui/chart"
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select"
import FormPembayaran from "./add-pembayaran"

export const description = "An interactive area chart"

const chartConfig = {
    pengeluaran: {
        label: "Pengeluaran",
        color: "var(--chart-1)",
    },
    pemasukkan: {
        label: "Pemasukkan",
        color: "var(--chart-2)",
    },
} satisfies ChartConfig

function generateDateRange(startDate: Date, endDate: Date) {
    const dates = []
    let currentDate = new Date(startDate)
    while (currentDate <= endDate) {
        dates.push(currentDate.toISOString().split("T")[0]) // yyyy-mm-dd
        currentDate.setDate(currentDate.getDate() + 1)
    }
    return dates
}

function fillMissingDates(data:any, startDate:any, endDate:any) {
    const allDates = generateDateRange(startDate, endDate)
    const dataMap = new Map(data.map((item:any) => [item.date, item]))

    return allDates.map((dateStr) => {
        if (dataMap.has(dateStr)) {
            return dataMap.get(dateStr)
        }
        // Jika tanggal tidak ada data, isi default 0
        return {
            date: dateStr,
            pemasukkan: 0,
            pengeluaran: 0,
        }
    })
}

export function ChartAreaInteractive() {
    const [timeRange, setTimeRange] = React.useState("365d")
    const { isPending, error, data } = useQuery({
        queryKey: ["Report"],
        queryFn: () => api.get("/report-summary").then((res) => res.data),
    })

    if (isPending) return "Loading..."

    if (error) return "An error has occurred: " + error.message

    const referenceDate = new Date("2025-06-30")
    let daysToSubtract = 365
    if (timeRange === "30d") daysToSubtract = 30
    else if (timeRange === "7d") daysToSubtract = 7
    else if (timeRange === "90d") daysToSubtract = 90

    const startDate = new Date(referenceDate)
    startDate.setDate(referenceDate.getDate() - daysToSubtract)

    const filteredRawData = (data ?? []).filter((item:any) => {
        const date = new Date(item.date)
        return date >= startDate && date <= referenceDate
    })

    const filteredData = fillMissingDates(filteredRawData, startDate, referenceDate)

    return (
        <Card className="pt-0">
            <CardHeader className="flex items-center gap-2 space-y-0 border-b py-5 sm:flex-row">
                <div className="grid flex-1 gap-1">
                    <CardTitle>Keuangan</CardTitle>
                    <CardDescription>
                       Rangkuman Keuangan RT
                    </CardDescription>
                    
                </div>
                 <FormPembayaran/>
                <Select value={timeRange} onValueChange={setTimeRange}>
                    <SelectTrigger
                        className="hidden w-[160px] rounded-lg sm:ml-auto sm:flex"
                        aria-label="Select a value"
                    >
                        <SelectValue placeholder="Select time range" />
                    </SelectTrigger>
                    <SelectContent className="rounded-xl">
                        <SelectItem value="90d" className="rounded-lg">
                            Last 3 months
                        </SelectItem>
                        <SelectItem value="30d" className="rounded-lg">
                            Last 30 days
                        </SelectItem>
                        <SelectItem value="7d" className="rounded-lg">
                            Last 7 days
                        </SelectItem>
                        <SelectItem value="365d" className="rounded-lg">
                            Last 1 year
                        </SelectItem>
                    </SelectContent>
                </Select>
               
            </CardHeader>
            <CardContent className="px-2 pt-4 sm:px-6 sm:pt-6">
                <ChartContainer
                    config={chartConfig}
                    className="aspect-auto h-[250px] w-full"
                >
                    <AreaChart data={filteredData}>
                        <CartesianGrid vertical={false} />
                        <XAxis
                            dataKey="date"
                            tickLine={false}
                            axisLine={false}
                            tickMargin={8}
                            minTickGap={20}
                            tickFormatter={(value) => {
                                const date = new Date(value)
                                return date.toLocaleDateString("en-US", {
                                    month: "short",
                                    day: "numeric",
                                })
                            }}
                        />
                        <ChartTooltip
                            cursor={false}
                            content={
                                <ChartTooltipContent
                                    labelFormatter={(value) => {
                                        return new Date(value).toLocaleDateString("en-US", {
                                            month: "short",
                                            day: "numeric",
                                        })
                                    }}
                                    indicator="dot"
                                />
                            }
                        />
                        <Area
                            dataKey="pemasukkan"
                            type="natural"
                            fill={chartConfig.pemasukkan.color}
                            stroke={chartConfig.pemasukkan.color}
                            stackId="a"
                        />
                        <Area
                            dataKey="pengeluaran"
                            type="natural"
                            fill={chartConfig.pengeluaran.color}
                            stroke={chartConfig.pengeluaran.color}
                            stackId="a"
                        />
                        <ChartLegend content={<ChartLegendContent />} />
                    </AreaChart>
                </ChartContainer>
            </CardContent>
        </Card>
    )
}
